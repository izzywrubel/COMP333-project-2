# Generated by Django 3.2.12 on 2022-03-09 01:06

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('music', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='artists',
            name='id',
        ),
        migrations.RemoveField(
            model_name='users',
            name='id',
        ),
        migrations.AlterField(
            model_name='artists',
            name='song',
            field=models.CharField(max_length=200, primary_key=True, serialize=False),
        ),
        migrations.AlterField(
            model_name='users',
            name='username',
            field=models.CharField(max_length=200, primary_key=True, serialize=False),
        ),
    ]
