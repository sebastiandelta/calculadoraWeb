<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Científica</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="calculadora-container">
        <h2 class="text-center">Calculadora Científica</h2>
        <div class="display" id="display">0</div>

        <div class="row">
            <button class="btn btn-light" onclick="appendToDisplay('7')">7</button>
            <button class="btn btn-light" onclick="appendToDisplay('8')">8</button>
            <button class="btn btn-light" onclick="appendToDisplay('9')">9</button>
            <button class="btn btn-operator" onclick="setOperation('/')">/</button>
        </div>
        <div class="row">
            <button class="btn btn-light" onclick="appendToDisplay('4')">4</button>
            <button class="btn btn-light" onclick="appendToDisplay('5')">5</button>
            <button class="btn btn-light" onclick="appendToDisplay('6')">6</button>
            <button class="btn btn-operator" onclick="setOperation('*')">*</button>
        </div>
        <div class="row">
            <button class="btn btn-light" onclick="appendToDisplay('1')">1</button>
            <button class="btn btn-light" onclick="appendToDisplay('2')">2</button>
            <button class="btn btn-light" onclick="appendToDisplay('3')">3</button>
            <button class="btn btn-operator" onclick="setOperation('-')">-</button>
        </div>
        <div class="row">
            <button class="btn btn-light" onclick="appendToDisplay('0')">0</button>
            <button class="btn btn-light" onclick="appendToDisplay('.')">.</button>
            <button class="btn-danger" onclick="clearDisplay()">C</button>
            <button class="btn btn-operator" onclick="setOperation('+')">+</button>
        </div>
        <div class="row">
            <button class="btn btn-light" onclick="calculateSquareRoot()">√</button>
            <button class="btn btn-light" onclick="calculatePower()">x²</button>
            <button class="btn btn-light" onclick="calculateSine()">sin</button>
            <button class="btn btn-light" onclick="calculateCosine()">cos</button>
        </div>
        <div class="row">
            <button class="btn btn-light" onclick="calculateTangent()">tan</button>
            <button class="btn btn-operator" onclick="calculate()" style="flex: 2;">=</button>
        </div>
    </div>

    <script>
        let currentInput = '';
        let operation = null;

        function appendToDisplay(value) {
            if (currentInput.length < 10) {
                currentInput += value;
                updateDisplay();
            }
        }

        function setOperation(op) {
            if (currentInput) {
                operation = op;
                window.lastInput = parseFloat(currentInput);
                currentInput = '';
                updateDisplay();
            }
        }

        function calculate() {
            if (operation && currentInput) {
                const secondInput = parseFloat(currentInput);
                let result;

                switch (operation) {
                    case '+':
                        result = lastInput + secondInput;
                        break;
                    case '-':
                        result = lastInput - secondInput;
                        break;
                    case '*':
                        result = lastInput * secondInput;
                        break;
                    case '/':
                        result = lastInput / secondInput;
                        break;
                }

                currentInput = result.toString();
                operation = null;
                updateDisplay();
            }
        }

        function clearDisplay() {
            currentInput = '';
            operation = null;
            updateDisplay();
        }

        function updateDisplay() {
            document.getElementById('display').textContent = currentInput || '0';
        }

        function calculateSquareRoot() {
            if (currentInput) {
                const result = Math.sqrt(parseFloat(currentInput));
                currentInput = result.toString();
                updateDisplay();
            }
        }

        function calculatePower() {
            if (currentInput) {
                const result = Math.pow(parseFloat(currentInput), 2);
                currentInput = result.toString();
                updateDisplay();
            }
        }

        function calculateSine() {
            if (currentInput) {
                const result = Math.sin(parseFloat(currentInput) * Math.PI / 180);
                currentInput = result.toString();
                updateDisplay();
            }
        }

        function calculateCosine() {
            if (currentInput) {
                const result = Math.cos(parseFloat(currentInput) * Math.PI / 180);
                currentInput = result.toString();
                updateDisplay();
            }
        }

        function calculateTangent() {
            if (currentInput) {
                const result = Math.tan(parseFloat(currentInput) * Math.PI / 180);
                currentInput = result.toString();
                updateDisplay();
            }
        }

        // Detectar entradas de teclado
        document.addEventListener('keydown', function(event) {
            const key = event.key;

            if (!isNaN(key) || key === '.') {
                appendToDisplay(key);
            } else if (key === 'Enter') {
                calculate();
            } else if (key === 'c' || key === 'C') {
                clearDisplay();
            } else if (['+', '-', '*', '/'].includes(key)) {
                setOperation(key);
            } else if (key === 'r') { // Raíz cuadrada
                calculateSquareRoot();
            } else if (key === 's') { // Seno
                calculateSine();
            } else if (key === 'o') { // Coseno
                calculateCosine();
            } else if (key === 't') { // Tangente
                calculateTangent();
            }
        });
    </script>
</body>
</html>
