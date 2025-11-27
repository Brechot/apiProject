import requests
from django.http import JsonResponse
from django.shortcuts import render, redirect

API_URL = "http://springapp:8080/api/produtos"
def list_products(request):
    print(">>>> ENTROU NA VIEW <<<<")

    response = requests.get(f"{API_URL}/todos", timeout=5)
    print(">>>> DEPOIS DO REQUEST <<<<")

    products = response.json()
    print(">>>> JSON OK <<<<", products)

    print(">>>> JSON RECEBIDO <<<<", products)

    return render(request, "products/list.html", {"products": products})


def create_product(request):
    if request.method == "POST":
        data = {
            "nome": request.POST.get("nome"),
            "preco": request.POST.get("preco"),
            "codigo": request.POST.get("codigo"),
        }

        requests.post(API_URL, json=data)

        return redirect("products_list")

    return render(request, "products/form.html")


def edit_product(request, id):
    product = requests.get(f"{API_URL}/{id}").json()

    if request.method == "POST":
        data = {
            "nome": request.POST.get("nome"),
            "preco": request.POST.get("preco"),
        }

        requests.put(f"{API_URL}/{id}", json=data)

        return redirect("products_list")

    return render(request, "products/form.html", {"product": product})


def delete_product(request, id):
    requests.delete(f"{API_URL}/{id}")
    return redirect("products_list")
