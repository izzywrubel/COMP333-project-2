from django.db import models

class artists(models.Model):
    song = models.CharField(primary_key = True, max_length=200)
    artist = models.CharField(max_length=200)

class ratings(models.Model):
    id = models.IntegerField(primary_key = True)
    username = models.CharField(max_length=200)
    song = models.CharField(max_length=200)
    rating = models.IntegerField(default=0)

class users(models.Model):
    username = models.CharField(primary_key = True, max_length=200)
    password = models.CharField(max_length=200)

class genres(models.Model):
    song = models.CharField(max_length=200)
    artist = models.CharField(primary_key = True, max_length=200)
    genre = models.CharField(max_length=200)
