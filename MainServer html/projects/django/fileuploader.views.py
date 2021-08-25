from random import randint

from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.core.files.storage import default_storage


def index(request):
    return render(request, 'fileuploader/index.html', {
        'lst': [1, 2, 3, 4, 5, 'salam'],
    })


def upload(request):
    default_storage.save('file', request.FILES['fileToUpload'])
    return redirect('/')
