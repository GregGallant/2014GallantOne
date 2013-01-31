#!/usr/bin/python
# -*- coding: utf-8 -*-

# Network Refresh creates screenshots of images
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

    except MySQLdb.Error, e:
        print "Error %d: %s" % (e.args[0], e.args[1])
        sys.exit(1)
    finally:
        if cur:
            conn.close()


def createImages(row):

    aUrl = row[0].split('.')
    command = tDir+"IECapt --silent --url=http://"+row[0]+" --out="+tDir+aUrl[1]+".png"
    os.system(command)

getNetworkData()

