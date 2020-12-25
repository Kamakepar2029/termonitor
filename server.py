import os

class ServerData():
  def __init__(self):
    self.data = ''
  
  def get_all_storage(self):
    #os.system('free -m>sto.txt')
    #data = open('sto.txt','r').read()
    data = os.popen("free -m").read()
    mass = data.split('\n')
    memmory_mass = mass[1].replace('Mem:','').split('  ')
    swap_mass = mass[2].replace('Swap:','').split('  ')
    memmory_mass_ready = []
    swap_mass_ready = []
    for dated in memmory_mass:
      if (dated != ''):
        memmory_mass_ready.append(dated.replace(' ',''))
    for dated in swap_mass:
      if (dated != ''):
        swap_mass_ready.append(dated.replace(' ',''))
    self.mem_total = memmory_mass_ready[0]
    self.mem_used = memmory_mass_ready[1]
    self.mem_free = memmory_mass_ready[2]
    self.mem_shared = memmory_mass_ready[3]
    self.mem_buffer = memmory_mass_ready[4]
    self.mem_avail = memmory_mass_ready[5]
    self.swap_one = swap_mass_ready[0]
    self.swap_two = swap_mass_ready[1]
    self.swap_three = swap_mass_ready[2]
  
  def get_loaded_services(self):
    return True
  
  def get_dir_contents(self,directory):
    try:
      return os.listdir(directory)
      pass 
    except Exception as e:
      return e
      pass
  
  def start_command(self,command):
    try:
      os.system(command)
      return 'Command Successfully Started' 
      pass
    except Exception as e:
      return e
      pass

  def isservice(self,service):
    service_data = os.popen(service+" -h").read()
    if (service_data != ''):
      return service
    else:
      return 'Service '+service+' doesnt exist.'