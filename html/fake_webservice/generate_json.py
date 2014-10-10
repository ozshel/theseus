from pprint import pprint
from loremipsum import get_paragraphs, get_sentences
from datetime import datetime
import time
import json
from random import randrange

to_generate = [
{"type": "user_list", "data": ["id", "username", "lastname", "password", "birthday", "phone", "created_at", "address", "group"]},
{"type": "group_list", "data": ["id", "role"]},
{"type": "category_list", "data": ["id", "name", "parent"]},
{"type": "product_list", "data": ["id", "name", "price", "description", "reference", "supplier", "maker", "stock", "category", "image"]},
{"type": "product_by_category", "data": ["id", "name", "price", "description", "reference", "supplier", "maker", "stock", "category", "image"]},
{"type": "product_best_sales_list", "data": ["id", "name", "price", "description", "reference", "supplier", "maker", "stock", "category", "image"]},
{"type": "supplier_list", "data": ["id", "name"]},
{"type": "maker_list", "data": ["id", "name"]},
{"type": "event_list", "data": ["id", "title", "description", "event_date", "address", "available"]},
{"type": "order_list", "data": ["id", "quantity", "total", "created_at", "user", "event_sale"]},
]
def jsonify(attr):
	response_file = file(attr['type']+'.json' , 'w')
	response = []
	for x in xrange(0,20):
		one_item = {}
		for el in attr['data']:
			# print el
			if el == "id":
				one_item[el] = x
			elif el == "created_at" or el == "birthday" or el == "event_date":
				one_item[el] = str(time.strftime("%A %d %B %Y %H:%M:%S"))
			elif el == "parent":
				one_item[el] = 0
			elif el == "category":
				one_item[el] = randrange(10)
			elif el == "stock":
				one_item[el] = 1
			elif el == "username":
				one_item[el] = 'toto'
			elif el == "password":
				one_item[el] = 'toto'
			elif el == "group":
				one_item[el] = ['events', 'users']
			elif el == "address":
				one_item[el] = "25 rue Claude Tillier 75012 Paris"
			elif el == "available":
				one_item[el] = x
			elif el == "image":
				one_item[el] = "http://exmoorpet.com/wp-content/uploads/2012/08/cat.png"
			else:
				one_item[el] = get_sentences(1)[0]
		response.append(one_item)
	response_file.write(json.dumps({"data": [response]}))
	response_file.close()
	print response
	return response

def randword(count_letters):
	word = ""
	for x in xrange(1,count_letters):
		word += str(x)
	return word

for el  in to_generate:
	jsonify(el)