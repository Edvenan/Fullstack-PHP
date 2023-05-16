
db.createCollection( 'ulleres', {validator: {$jsonSchema: {bsonType: 'object',title:'ulleres',required: [         'marca',          'vidres',          'muntura',          'preu'],properties: {marca: {bsonType: 'objectId'},vidres: {bsonType: 'object',
title:'object',required: [         'color',          'graduacio'],properties: {color: {bsonType: 'object',
title:'object',required: [         'dret',          'esquerre'],properties: {dret: {bsonType: 'string'},esquerre: {bsonType: 'string'}}},graduacio: {bsonType: 'object',
title:'object',required: [         'dret',          'esquerre'],properties: {dret: {bsonType: 'string'},esquerre: {bsonType: 'string'}}}}},muntura: {bsonType: 'object',
title:'object',required: [         'color',          'tipus'],properties: {color: {bsonType: 'string'},tipus: {enum: "pasta","metalica", "flotant"}}},preu: {bsonType: 'decimal'}}         }      }});  