from django.urls import path
from . import views

urlpatterns = [
    path("", views.list_products, name="products_list"),
    path("new/", views.create_product, name="products_create"),
    path("edit/<int:id>/", views.edit_product, name="products_edit"),
    path("delete/<int:id>/", views.delete_product, name="products_delete"),
]