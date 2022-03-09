from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader
from .models import ratings
from .models import users
from .models import genres

def index(request):
    context = {}
    print_line = ""
    context = {'status' : 'error',}
    user_rating = []
    original_user = 0

    # User Retrieval Form
    if request.method == 'GET':
        context['formstatus'] = 'retrieval'
        user = request.GET.get('user')
        # List of ratings table
        rating_list = ratings.objects.all()
        # List of genres table
        genre_list = genres.objects.all()
        context['genres'] = genre_list
        context['ratings'] = rating_list
        # Including our new genres table in the retrieval form to fulfill part Problem 2b
        for r in rating_list:
            if r.username == user:
                for g in genre_list:
                    if r.song == g.song:
                        user_rating.append((str(r.song) + " by " + g.artist
                        + " is of genre type " + g.genre +
                        " and has a rating of " + str(r.rating) + "\n"))
                        context['status'] = 'success'
        context['print_line'] = user_rating
        return render(request, 'music/index.html', context)

    # User Registration Form
    if request.method == 'POST':
        context['formstatus'] = 'registration'
        user = request.POST.get('user')
        password = request.POST.get('password')
        username_list = users.objects.all()
        context['usernames'] = username_list
        for u in username_list:
            if u.username == user:
                original_user += 1

        # Doesn't add the user to the database if it's been seen before
        if original_user > 1:
            context['status'] = 'error'
        # Adds user to database if it hasn't been seen before
        elif original_user == 0:
            context['status'] = 'success'
            u = users(username = user, password = password)
            u.save()
            
        context['print_line'] = user_rating
        return render(request, 'music/index.html', context)

def detail(request, id):
    return HttpResponse()
