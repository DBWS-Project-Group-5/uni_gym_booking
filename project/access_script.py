#path to access log file
path = "/var/log/apache2/access_log"


with open(path, 'r') as file:
	data = file.read().split("\n")

	ip_list = []
	time_list = []
	application_list = []
	url_list = []
	for access in data:
		flag = False
		if(access.find("skattel")>=0 or access.find("nibragimov")>=0):
			#split into ip and the rest of the 
			x = access.split(" - - ")
			ip_list.append(x[0]);
			
			y = x[1].split("\"")
			
			#append time to time_list
			time_list.append(y[0])
			
			#append applications to application_list
			application_list.append(y[-2])
			
			for item in y:
				if "http" in item:
					url_list.append(item);
					flag = True
			if(not flag):
				url_list.append("No URL in log file")
			
with open("access.csv", "w+") as file:
	for i in range(len(ip_list)):
		file.write("{},{},{},{}\n".format(ip_list[i], time_list[i], application_list[i], url_list[i]))

