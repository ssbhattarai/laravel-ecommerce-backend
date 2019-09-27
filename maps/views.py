from django.shortcuts import render


def index(request):
    context = {
        'helloworld': 'Helo World',
    }
    return render(request, 'maps.html', context=context)


def rivers(request):
    context = {
        'helloworld': 'Helo World',
    }
    return render(request, 'riversmap.html', context=context)


def institutions(request):
    context = {
        'helloworld': 'Helo World',
    }
    return render(request, 'institutionsmap.html', context=context)

    
