import React, { useState, useEffect } from 'react';
import * as ort from 'onnxruntime-web';

const App = () => {
    const [sepalLength, setSepalLength] = useState('');
    const [sepalWidth, setSepalWidth] = useState('');
    const [petalLength, setPetalLength] = useState('');
    const [petalWidth, setPetalWidth] = useState('');
    const [prediction, setPrediction] = useState('');

    const modelPath = './modelo_nb.onnx'; // Reemplaza con la ruta a tu modelo
    let session;

    useEffect(() => {
        const loadModel = async () => {
            session = await ort.InferenceSession.create(modelPath);
        };

        loadModel();
    }, []);

    const handlePredict = async () => {
        try {
            const inputData = new Float32Array([
                parseFloat(sepalLength),
                parseFloat(sepalWidth),
                parseFloat(petalLength),
                parseFloat(petalWidth)
            ]);

            const inputTensor = new ort.Tensor('float32', inputData, [1, 4]);
            const feeds = { [session.inputNames[0]]: inputTensor };

            const results = await session.run(feeds);
            const output = results[session.outputNames[0]].data;

            setPrediction(`Clase predicha: ${output[0]}`);
        } catch (error) {
            setPrediction('Por favor, ingrese valores numéricos válidos.');
        }
    };

    return (
        <div style={{ padding: '20px' }}>
            <h1>Predicción de Especies de Flores</h1>
            <div>
                <label>Longitud del sépalo:</label>
                <input
                    type="text"
                    value={sepalLength}
                    onChange={(e) => setSepalLength(e.target.value)}
                />
            </div>
            <div>
                <label>Ancho del sépalo:</label>
                <input
                    type="text"
                    value={sepalWidth}
                    onChange={(e) => setSepalWidth(e.target.value)}
                />
            </div>
            <div>
                <label>Longitud del pétalo:</label>
                <input
                    type="text"
                    value={petalLength}
                    onChange={(e) => setPetalLength(e.target.value)}
                />
            </div>
            <div>
                <label>Ancho del pétalo:</label>
                <input
                    type="text"
                    value={petalWidth}
                    onChange={(e) => setPetalWidth(e.target.value)}
                />
            </div>
            <button onClick={handlePredict}>Predecir</button>
            <h2>{prediction}</h2>
        </div>
    );
};

export default App;

