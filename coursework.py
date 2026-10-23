from tkinter import *
from tkinter import messagebox
#from tkinter.ttk import Label ## might not be needed # wasn't
import os

import tkinter.font as tkFont

''' This should be the login screen '''

def loginWindow():
    win=Tk()
    win.title("Electronic Health Record")
    win.geometry("1000x600")

    default_font = tkFont.nametofont("TkDefaultFont") ## global font change
    default_font.configure(size=8)
    tf = tkFont.Font(family="Arial", size=12, weight="bold") ## title font

    # Header

    titleFrame = Frame(win, background="orange")
    titleFrame.place(width=1000, height=50, x=0, y=0)
    headerTitle = Label(titleFrame, background="orange", foreground="white", text="Mapleview EHR", font=("Arial", 16, "bold"))
    headerTitle.place(relx=0.5, rely=0.5, anchor=CENTER)

    # /Header

    bgFrame = Frame(win, background="light gray")
    bgFrame.place(width=1000, height=550, x=0, y=50)

    entryTitle = Label(bgFrame, text="Login", font=("Arial", 12, "bold"))
    entryTitle.place(relx=0.5, y=50, anchor=CENTER)

    # Login frame

    entryFrame = Frame(win, background="white")
    entryFrame.place(width=300, height=300, x=350, y=125)

    userLabel = Label(entryFrame, text="Username")
    userLabel.place(x=20, y=40)
    userEntry = Entry(entryFrame)
    userEntry.place(x=80, y=36)

    passLabel = Label(entryFrame, text="Password")
    passLabel.place(x=20, y=100)
    passEntry = Entry(entryFrame)
    passEntry.place(x=80, y=96)

    # /Login frame

    return win

win = loginWindow()
win.mainloop()
