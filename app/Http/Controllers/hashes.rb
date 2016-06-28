diccionario_a = Hash.new
diccionario_b = {}
puts diccionario_a
puts diccionario_b

datos_personales = {"Nombre" => "Johan" , "Apellido" => "Villamil"}
moto_x = {:Marca => "Motorola" , :camara => "12 mpx"}
cubo_rubik = { Marca: "Cyclone Boy" , Dimesion: "3x3"}

puts datos_personales["Nombre"]
puts moto_x[:Marca]


#agrgar al dicionario

datos_personales["Edad"]  = 21 
puts datos_personales
moto_x.store(:Procesador ,"Quad Core")

puts moto_x

#Unir diccionarios
#metodo peligroso altera el objeto original
datos_personales.merge!(moto_x)

puts datos_personales