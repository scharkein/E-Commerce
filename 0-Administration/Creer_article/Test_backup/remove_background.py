from rembg import remove
from PIL import Image

import time
start_time=time.time()


input_path ='3_4.png'
output_path = '3_4_result.png'
input = Image.open(input_path)
output = remove ( input)
output.save(output_path)



end_time=time.time()
exec_time=end_time-start_time
print(exec_time)