from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name='home'),
    path('universities/', views.university_list, name='university_list'),
    path('universities/<int:pk>/', views.university_detail, name='university_detail'),
    path('universities/create/', views.university_create, name='university_create'),
    path('universities/<int:pk>/update/', views.university_update, name='university_update'),
    path('universities/<int:pk>/delete/', views.university_delete, name='university_delete'),
    path('students/', views.student_list, name='student_list'),
    path('students/<int:pk>/', views.student_detail, name='student_detail'),
    path('students/create/', views.student_create, name='student_create'),
    path('students/<int:pk>/update/', views.student_update, name='student_update'),
    path('students/<int:pk>/delete/', views.student_delete, name='student_delete'),
]
