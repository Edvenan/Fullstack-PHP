
db.createCollection( 'categoria', {validator: {$jsonSchema: {bsonType: 'object',title:'categoria',required: [         'nom'],properties: {nom: {bsonType: 'string'}}         }      }});  