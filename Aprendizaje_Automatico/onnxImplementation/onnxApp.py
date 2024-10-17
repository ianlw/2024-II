import sys

import numpy as np
import onnxruntime as ort
from PyQt5.QtWidgets import QApplication
from PyQt5.QtWidgets import QLabel
from PyQt5.QtWidgets import QLineEdit
from PyQt5.QtWidgets import QPushButton
from PyQt5.QtWidgets import QVBoxLayout
from PyQt5.QtWidgets import QWidget

# Cargar el modelo ONNX
model_path = "./modelo_nb.onnx"  # Reemplaza con la ruta a tu modelo
session = ort.InferenceSession(model_path)


class VentanaPrediccion(QWidget):
    def __init__(self):
        super().__init__()

        self.setWindowTitle("Predicción de Especies de Flores")

        # Crear etiquetas y campos de entrada
        self.label_sepal_length = QLabel("Longitud del sépalo:")
        self.input_sepal_length = QLineEdit()

        self.label_sepal_width = QLabel("Ancho del sépalo:")
        self.input_sepal_width = QLineEdit()

        self.label_petal_length = QLabel("Longitud del pétalo:")
        self.input_petal_length = QLineEdit()

        self.label_petal_width = QLabel("Ancho del pétalo:")
        self.input_petal_width = QLineEdit()

        self.boton_predecir = QPushButton("Predecir")
        self.boton_predecir.clicked.connect(self.realizar_prediccion)

        # Etiqueta para mostrar el resultado
        self.label_resultado = QLabel("Predicción: Clase ")

        # Crear un layout
        layout = QVBoxLayout()
        layout.addWidget(self.label_sepal_length)
        layout.addWidget(self.input_sepal_length)
        layout.addWidget(self.label_sepal_width)
        layout.addWidget(self.input_sepal_width)
        layout.addWidget(self.label_petal_length)
        layout.addWidget(self.input_petal_length)
        layout.addWidget(self.label_petal_width)
        layout.addWidget(self.input_petal_width)
        layout.addWidget(self.boton_predecir)
        layout.addWidget(self.label_resultado)

        self.setLayout(layout)

    def realizar_prediccion(self):
        try:
            # Obtener los datos de entrada
            sepal_length = float(self.input_sepal_length.text())
            sepal_width = float(self.input_sepal_width.text())
            petal_length = float(self.input_petal_length.text())
            petal_width = float(self.input_petal_width.text())

            # Preparar los datos de entrada
            nuevo_dato = np.array(
                [[sepal_length, sepal_width, petal_length, petal_width]],
                dtype=np.float32,
            )
            input_name = session.get_inputs()[0].name

            # Realizar la predicción
            resultados = session.run(None, {input_name: nuevo_dato})
            prediccion = resultados[0]

            # Mostrar el resultado en la misma ventana
            self.label_resultado.setText(f"Predicción: Clase {prediccion[0]}")

        except ValueError:
            self.label_resultado.setText(
                "Por favor, ingrese valores numéricos válidos."
            )


if __name__ == "__main__":
    app = QApplication(sys.argv)
    ventana = VentanaPrediccion()
    ventana.resize(300, 300)
    ventana.show()
    sys.exit(app.exec_())
