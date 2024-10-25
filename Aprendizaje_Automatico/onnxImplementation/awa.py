import numpy as np
from PIL import Image

# Cargar la nueva imagen
img = Image.open("./WhatsApp Image 2024-10-19 at 10.16.29 PM.jpeg")

# Convertir la imagen a escala de grises
img_gray = img.convert("L")

# Redimensionar la imagen a la resolución original de tu dataset (por ejemplo, 48x48 píxeles si es el caso)
img_resized = img_gray.resize((48, 48))

# Convertir la imagen a una matriz numpy
img_array = np.array(img_resized)

# Normalizar los valores de los píxeles a un rango de [0, 1]
img_normalized = img_array / 255.0

# Aplanar la matriz para que sea un vector, como en el dataset que compartiste
img_flattened = img_normalized.flatten()

# Si necesitas añadir una columna adicional (como en tu dataset original)
img_data = np.append(img_flattened, 1)  # Añade una etiqueta o valor extra, como un "1"

# Mostrar los primeros valores para verificar
print(img_data)  # Muestra los primeros 20 valores
