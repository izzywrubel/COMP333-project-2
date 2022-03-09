QUESTION 2

Part a) 
After creating the models in _models.py_, we ran the commands 'python3 manage.py makemigrations' and 'python3 manage.py migrate' to apply those models to our database. Then in the python shell, we ran the following commands to add data into our models: 

```python
>>> from music.models import artists, ratings, users
>>> a = artists(song = "Freeway", artist = "Aimee Mann")
>>> a.save()

>>> a2 = artists(song = "Days of Wine and Roses", artist = "Bill Evans")
>>> a2.save()

>>> a3 = artists(song = "These Walls", artist = "Kendrick Lamar")
>>> a3.save()



>>> r = ratings(id = 1, username = "Amelia-Earhart", song = "Freeway", rating = 3)
>>> r.save()

>>> r2 = ratings(id = 2, username = "Amelia-Earhart", song = "Days of Wine and Roses", rating = 4)
>>> r2.save()

>>> r3 = ratings(id = 3, username = "Otto", song = "Days of Wine and Roses", rating = 5)
>>> r3.save()

>>> r4 = ratings(id = 4, username = "Amelia-Earhart", song = "These Walls", rating = 4)
>>> r4.save()


>>> u = users(username = "Amelia-Earhart", password = "Youaom139&yu7")
>>> u.save()

>>> u2 = users(username = "Otto", password = "StarWars2*")
>>> u2.save()

>>> from music.models import genres
>>> g = genres(song = "Freeway", artist = "Aimee Mann", genre = "Indie")
>>> g.save()

>>> g2 = genres(song = "Days of Wine and Roses", artist = "Bill Evans", genre = "Jazz")
>>> g2.save()

>>> g3 = genres(song = "These Walls", artist = "Kendrick Lamar", genre = "Rap")
>>> g3.save()
```

After adding all of the above data into our database, run the server using "python3 manage.py runserver" and copy local url given in the terminal to view the live website. 