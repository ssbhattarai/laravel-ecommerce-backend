from django.urls import path, include
from rest_framework import routers

from . import views
urlpatterns = [
    path('', views.index, name='index'),
    path('rivers', views.rivers, name='rivers'),
    path('institutions', views.institutions, name='institutions'),
]
