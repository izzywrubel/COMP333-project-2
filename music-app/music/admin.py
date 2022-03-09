from django.contrib import admin

from .models import ratings
from .models import artists
from .models import users
from .models import genres

admin.site.register(ratings)
admin.site.register(artists)
admin.site.register(users)
admin.site.register(genres)
