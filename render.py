import json

def render(args, template):
  html = open(template,'r').read()
  js = json.loads(args)
  for pol in js:
    html = html.replace('%'+pol+'%',js[pol])
  return html