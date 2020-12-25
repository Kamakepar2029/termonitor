from server import ServerData
import os
from render import render
from flask import Flask, request, render_template, redirect, url_for

DEBUG = True


server = ServerData()
server.get_all_storage()
total = server.mem_total
used = server.mem_used
free = server.mem_free
shared = server.mem_shared
buffer = server.mem_buffer
avail = server.mem_avail
sw_total = server.swap_one
sw_used = server.swap_two
sw_free = server.swap_three
current_directory = os.getcwd()
print(server.isservice('php'))

app = Flask(__name__, template_folder="templates")


@app.route('/')
def index():
    return render('{"me":"me"}','templates/index.php')


@app.route('/getmemory')
def domain():
  server.get_all_storage()
  total = server.mem_total
  used = server.mem_used
  free = server.mem_free
  shared = server.mem_shared
  buffer = server.mem_buffer
  avail = server.mem_avail
  sw_total = server.swap_one
  sw_used = server.swap_two
  sw_free = server.swap_three
  js = '{"total":"'+total+'","used":"'+used+'","free":"'+free+'","shared":"'+shared+'","buffered":"'+buffer+'","avail":"'+avail+'","sw_total":"'+sw_total+'","sw_free":"'+sw_free+'","sw_used":"'+sw_used+'"}'
  return js


@app.route('/admin')
def check():
  server.get_all_storage()
  total = server.mem_total
  used = server.mem_used
  free = server.mem_free
  shared = server.mem_shared
  buffer = server.mem_buffer
  avail = server.mem_avail
  sw_total = server.swap_one
  sw_used = server.swap_two
  sw_free = server.swap_three
  js = '{"total":"'+total+'","used":"'+used+'","free":"'+free+'","shared":"'+shared+'","buffered":"'+buffer+'","avail":"'+avail+'","sw_total":"'+sw_total+'","sw_free":"'+sw_free+'","sw_used":"'+sw_used+'"}'
  return render(js,'templates/admin.php')


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1024)