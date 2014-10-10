from pprint import pprint
from loremipsum import get_paragraphs, get_sentences
from datetime import datetime
import time
import json

user_list_attr = {"type": "user_list", "data": ["id", "username", "lastname", "password", "birthday", "phone", "created_at", "address", "group"]}
group_list_attr = {"type": "group_list", "data": ["id", "role"]}
category_list_attr = {"type": "category_list", "data": ["id", "name", "parent"]}
product_list_attr = {"type": "product_list", "data": ["id", "name", "price", "description", "reference", "supplier", "maker", "stock", "category", "image"]}
supplier_list_attr = {"type": "supplier_list", "data": ["id", "name"]}
maker_list_attr = {"type": "maker_list", "data": ["id", "name"]}
event_list_attr = {"type": "event_list", "data": ["id", "title", "description", "event_date", "address", "available"]}
order_list_attr = {"type": "order_list", "data": ["id", "quantity", "total", "created_at", "user", "event_sale"]}

def jsonify(attr):
	#response_file = file('json_files/'+attr['type']+'.json' , 'w')
	response_file = file(attr['type']+'.json' , 'w')
	response = []
	for x in xrange(0,20):
		one_user = {}
		for el in attr['data']:
			# print el
			if el == "id":
				one_user[el] = str(x)
			elif el == "created_at" or el == "birthday" or el == "event_date":
				one_user[el] = str(time.strftime("%A %d %B %Y %H:%M:%S"))
			elif el == "parent":
				one_user[el] = str(0)
			elif el == "category":
				one_user[el] = str(1)
			elif el == "username":
				one_user[el] = 'toto'
			elif el == "password":
				one_user[el] = 'toto'
			elif el == "group":
				one_user[el] = ['events', 'users']
			elif el == "address":
				one_user[el] = "25 rue Claude Tillier 75012 Paris"
			elif el == "available":
				one_user[el] = str(x)
			elif el == "image":
				one_user[el] = "http://exmoorpet.com/wp-content/uploads/2012/08/cat.png"
			else:
				one_user[el] = get_sentences(1)[0]
		response.append(one_user)
	response_file.write(json.dumps({"data": [response]}))
	response_file.close()
	print response
	return response

def randword(count_letters):
	word = ""
	for x in xrange(1,count_letters):
		word += str(x)
	return word

jsonify(user_list_attr)
jsonify(group_list_attr)
jsonify(category_list_attr)
jsonify(product_list_attr)
jsonify(supplier_list_attr)
jsonify(maker_list_attr)
jsonify(event_list_attr)
jsonify(order_list_attr)
