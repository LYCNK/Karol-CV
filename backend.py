from tkinter import *
from tkinter import messagebox

def saveTrip() :
    TripIDSave = TripIDVar.get()
    TripIDSave = TripIDSave.ljust(50)
    
    DateSave=DateVar.get()
    DateSave = DateSave.ljust(50)
    
    TimeSave = TimeVar.get()
    TimeSave = TimeSave.ljust(50)
    
    DescriptionSave = DescriptionVar.get()
    DescriptionSave = DescriptionSave.ljust(50)
    
    fileObject = open("Trips.txt","a")
    fileObject.write(TripIDSave + DateSave + TimeSave + DescriptionSave + "\n")
    fileObject.close()

    messagebox.showinfo("Saved", "Saved record")
    
    return

def loadTrip():
    try:
        fileObject=open("Trips.txt","r")
    except IOError:
        messagebox.showerror("Error","No file to read")

    while True:
        recordVar=fileObject.readline()
        if recordVar == "":
            fileObject.close
            messagebox.showerror("Load",loaded)
            break
        loaded[i] = recordVar
        i += 1

def makeWindow():

    
    global TripIDVar, DateVar, TimeVar, DescriptionVar

    #Create a window/form
    win = Tk()
    
    frame1=Frame(win)
    frame1.pack()

    Label(frame1, text="SKY Trips", font=("Helvetica 12 bold")).grid(row=0, column=0)
    
    Label(frame1, text="TripID").grid(row=1, column=0, sticky=W)
    TripIDVar=StringVar()
    TripID= Entry(frame1, textvariable=TripIDVar)
    TripID.grid(row=1,column=1,sticky=W)

    Label(frame1, text="Date").grid(row=2, column=0, sticky=W)
    DateVar=StringVar()
    Date= Entry(frame1, textvariable=DateVar)
    Date.grid(row=2,column=1,sticky=W)

    Label(frame1, text="Time").grid(row=3, column=0, sticky=W)
    TimeVar=StringVar()
    Time= Entry(frame1, textvariable=TimeVar)
    Time.grid(row=3,column=1,sticky=W)
    
    Label(frame1, text="Description").grid(row=4, column=0, sticky=W)
    DescriptionVar=StringVar()
    Description= Entry(frame1, textvariable=DescriptionVar)
    Description.grid(row=4,column=1,sticky=W)
    
    frame2 = Frame(win)
    frame2.pack()
    b1= Button(frame2, text=" Save ", command=saveTrip)
    b2= Button(frame2, text=" Load ", command=loadTrip)
    b1.pack(side=LEFT); b2.pack(side=LEFT)
    
    return win


#this is the main program!
win = makeWindow()
#win.run()
