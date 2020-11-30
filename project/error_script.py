path = "/var/log/apache2/error_log"

with open(path, 'r') as file:
	time_list = []
	ip_list = []
	err_list = []

	data = file.read().split("\n")

	for err in data:
		if ("skattel" in err) or ("nibragimov" in err):
			ip_start_index = err.find("client")+len("client")+1
			ip_end_index = ip_start_index + err[ip_start_index:].find("]")
			ip_string = err[ip_start_index: ip_end_index]
			ip_list.append(ip_string)
			
			err_start_index = ip_end_index + 2
			err_end_index = err.find("referer") - 2
			err_string = err[err_start_index: err_end_index]
			err_list.append(err_string)
			
			time_start_index = 1
			time_end_index = err.find("]")
			time_string = err[time_start_index: time_end_index]
			time_list.append(time_string)
				
			print(err)
			print("\n")

with open("error_log.csv", "w+") as file:
	for i in range(len(time_list)):
		file.write("{},{},{}\n".format(ip_list[i], err_list[i], time_list[i]))
