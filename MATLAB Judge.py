#!/usr/bin/env python
# coding: utf-8

# In[191]:


import os
from os import listdir
from os.path import isfile, join
from fnmatch import fnmatch
import shutil
import time
import zipfile
import textract, re
import patoolib


# In[254]:


#Definitions
def forsort(a):
    anis = 0;
    for i in range(len(a)):
        if a[i].isnumeric():
            anis*=10
            anis+= int(a[i])
    return anis

def keyWords(l):
    l=l.replace('(', ' ')
    l=l.replace(')', ' ')
    l=l.replace('[', ' ')
    l=l.replace(']', ' ')
    l=l.replace('-', ' ')
    l=l.replace('+', ' ')
    l=l.replace('*', ' ')
    l=l.replace('/', ' ')
    l=l.replace('=', ' ')
    l=l.replace('\n', ' ')
    l=l.replace('^', ' ')
    l = l.split(' ')
    l = {x for x in l if (len(x)>1 or x.isnumeric())}
    return l

def similar(s, t):
    inter = s.intersection(t)
    if len(t) == 0 and len(s) == 0:
        return 0.9
    if len(t) == 0 or len(s) == 0:
        return 0
    
    return max(len(inter)/len(t), len(inter)/len(s))

def isOK(s):
    global express
    flag = False
    per = 0
    per1 = 0
    for i in range(n):
        per = similar(s, express[i])
        #print(per, end=' ')
        per1 = max(per1, per)
        if per >= 0.5:
            flag = True
        
    #print(round(per1, 1), end = ' ')
    if flag == True:
        print("OK")
    if flag == False:
        print("Reconsidering...")
    return flag

def getID(a):
    backa=a
    a = a.replace('-', ' ')
    a = a.replace('_', ' ')
    a = a.replace('.', ' ')
    a = a.split()
    for x in a:
        if len(x) > 7 and x.isnumeric():
            return x
    return "Undefined ID "+backa+"\nMake sure to include your Student ID in the name of the zip file."

def onlyFileName(a):
    anis = ""
    for j in range(len(a)-1, 0, -1):
        if a[j] == '/':
            break
        anis += a[j]
    anis = anis[::-1]
    return anis

def fileExt(a):
    anis = ""
    for j in range(len(a)-1, 0, -1):
        if a[j] == '.':
            break
        anis += a[j]
    anis = anis[::-1]
    return anis


# In[255]:


express = [{} for i in range(100)] #Express[i]: set of key words for question i
path = 'Desktop/MATLAB/ANS/'
onlyfiles = [f for f in listdir(path) if isfile(join(path, f))]
onlyfiles = sorted(onlyfiles, key=forsort)
n = 0 #Number of questions
numOfChar = 0

for file in onlyfiles:
    n += 1
    express[n-1] = set()
    print(file)
    file1 = open(path+file, 'r') 
    print(path+file)
    Lines = file1.readlines() 
    for line in Lines:
        express[n-1]=express[n-1].union(keyWords(line))
        numOfChar+=len(line)
    print(express[n-1])
print(numOfChar)


# In[261]:


seat = [{} for i in range(100)] #Express[i]: set of key words for question i for student
path = 'Desktop/MATLAB/'
onlyfiles = [f for f in listdir(path) if isfile(join(path, f))]
onlyfiles = sorted(onlyfiles, key=forsort)

for student in onlyfiles:
    numOfCharS=0
    flagDoc=False
    print('\n\n')
    path = 'Desktop/MATLAB/'
    print('student:', getID(student))
    os.mkdir('Desktop/MATLAB/seat/')
    shutil.copyfile(path+student,path+'seat/'+student)
    
    if student[-1] == 'p':
        with zipfile.ZipFile(path+'seat/'+student, 'r') as zip_ref: #Extracting the zip file
            zip_ref.extractall('Desktop/MATLAB/seat/')
    if student[-1] == 'r':
        shutil.rmtree('Desktop/MATLAB/seat/')
        print("rar file ignored...")
        continue
    if student[:3] == 'RAR':
        print("> Submitting a rar file will not be tolerated.")
        
    root = 'Desktop/MATLAB/seat/'
    pattern = "*.*"
    ansuer=[]
    for path, subdirs, files in os.walk(root):
        for name in files:
            if fnmatch(name, pattern):
                newFile = str(os.path.join(path, name))
                if newFile[-1] != 'p' and newFile[-1] != 'f' and newFile[-1] != 'x':
                    ansuer+=[newFile]
                elif newFile[-1] == 'x':
                    print(newFile[-4:], "files are not accepted.")
                    
    ansuer = sorted(ansuer, key=forsort) #Matlab files
    #print(ansuer)
    nn = 0
    mark = 0
    for file in ansuer: #Finding characteristics of each answer
        nn += 1
        seat[nn-1] = set()
        file1 = open(file, 'r')
        print(onlyFileName(file), end= ' ')
        fe = fileExt(file)
        if fe != 'm' and fe != 'mat' and fe != 'ma' and fe != 'fig' and fe != 'png' and fe != 'jpg':
            print("File ingnored.")
            continue
        if fe == 'fig' or fe == 'png' or fe == 'jpg':
            print("You can include it only in your report.")
            continue
        Lines = file1.readlines() 
        for line in Lines:
            seat[nn-1]=seat[nn-1].union(keyWords(line))
            numOfCharS+=len(line)
            
        if isOK(seat[nn-1]): #Grading
            mark+=1
        #print(seat[nn-1])

    
    mark = min(90*(mark/n), 90)
    
    mark = max(mark, min(90*(numOfCharS*1.1/numOfChar), 90))
    
    numOfRep = 0
    #Grading the report
    root = 'Desktop/MATLAB/seat/'
    pattern = "*.pdf"
    report="0"
    for path, subdirs, files in os.walk(root):
        for name in files:
            if fnmatch(name, pattern):
                report=os.path.join(path, name)
                numOfRep+=1


    if numOfRep > 1:
        print("Submit only one report file.")
    if len(report) < 3:
        print("Report not found. Report file MUST be a pdf file.")
    else:
        print("Report:", end=' ')
        b = os.path.getsize(report)
        
        if b//1024 >= 500: #Bonus
            mark+=10
            print("Bonus Report")
        
        if b//1024 >= 300: #Bonus
            mark+=10
            print("Bonus Report")
            
        if b//1024 >= 100:
            mark+=10
            print("Full mark")
        else:
            b =(b//1024)/100
            mark+= (b*10)
            print(str(b*100)+'%', 'Too vague / insufficient screenshots')

    print("\nOverall mark:", min(mark, 100))
        
    
    shutil.rmtree('Desktop/MATLAB/seat/')


# In[ ]:




