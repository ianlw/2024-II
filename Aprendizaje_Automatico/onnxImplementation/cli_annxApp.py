import numpy as np
import onnxruntime as ort

# Cargar el modelo ONNX
model_path = "./modelo_nb.onnx"  # Reemplaza con la ruta a tu modelo
session = ort.InferenceSession(model_path)


# Función para ingresar datos
def ingresar_datos():
    sepal_length = float(input("Ingrese la longitud del sépalo: "))
    sepal_width = float(input("Ingrese el ancho del sépalo: "))
    petal_length = float(input("Ingrese la longitud del pétalo: "))
    petal_width = float(input("Ingrese el ancho del pétalo: "))
    return np.array(
        [[sepal_length, sepal_width, petal_length, petal_width]], dtype=np.float32
    )


# Ingresar nuevos datos
nuevo_dato = ingresar_datos()

# Obtener el nombre de la entrada del modelo
input_name = session.get_inputs()[0].name

# Realizar la predicción
resultados = session.run(None, {input_name: nuevo_dato})

# Mostrar el resultado de la predicción
prediccion = resultados[0]
probabilidades = resultados[1][0]

# Imprimir resultados de forma clara
print(f"\nClase predicha: {prediccion[0]}")
