#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb
import sys
import os

tDir = "C:\\Users\\GallantMedia\\Documents\\GallantMedia\\Websites\\GallantOne\\public\\images\\iecapt\\"

def getNetworkData():
    con = None

    try:
        conn = MySQLdb.connect('localhost', 'ggallant', 'courage', 'gallantone')
        cur = conn.cursor()
        cur.execute("SELECT name FROM networks")
        #result = con.use_result()
        result = cur.fetchall()

        for row in result:
            createImages(row)
            #command = tDir+"IECapt --url=http://"+row[0]+" --out="+aUrl[1]+".png"
            #command = tDir+"IECapt --url=http://www.goddessnyc.com/_staging.php --out="+tDir+aUrl[1]+".png"
            #os.system(command)
            #os.system(tDir+"IECapt --url=http://"+row[0]+" --out="+aUrl[1]+".png")

    except MySQLdb.Error, e:
        print "Error %d: %s" % (e.args[0], e.args[1])
        sys.exit(1)
    finally:
        if cur:
            conn.close()


def createImages(row):

    aUrl = row[0].split('.')
    command = tDir+"IECapt --url=http://"+row[0]+" --out="+tDir+aUrl[1]+".png"
    os.system(command)
    #os.system(tDir+"IECapt --url=http://www.goddessnyc.com --out=goddessnyc.png")


    #fo = open(tDir+"test.txt", "wb")

    #fo.write("This is only a test")

    #fo.close()


getNetworkData()

#createImages()
