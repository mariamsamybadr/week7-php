<?php
class Calculator {
  private $num1;
  private $num2;

  public function __construct($num1, $num2) {
    $this->num1 = $num1;
    $this->num2 = $num2;
  }

  public function add() {
    return $this->num1 + $this->num2;
  }

  public function subtract() {
    return $this->num1 - $this->num2;
  }

  public function multiply() {
    return $this->num1 * $this->num2;
  }
  public function divide() {
    if ($this->num2 == 0) {
        return "Cannot divide by zero";
    } else {
        return $this->num1 / $this->num2;
        
    }
}
}

if(isset($_POST['submit'])) {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operation = $_POST['operation'];

  $calculator = new Calculator($num1, $num2);

  switch($operation) {
    case 'add':
      $result = $calculator->add();
      break;
    case 'subtract':
      $result = $calculator->subtract();
      break;
    case 'divide':
      $result = $calculator->divide();
      break;
      case 'multiply':
        $result = $calculator->multiply();
        break;
    default:
      $result = "Invalid operation selected.";
  }
}
?>

<form action="" method="POST">
  <label for="num1">Number 1:</label>
  <input type="number" id="num1" name="num1" required>

  <label for="num2">Number 2:</label>
  <input type="number" id="num2" name="num2" required>

  <label for="operation">Operation:</label>
  <select id="operation" name="operation" required>
    <option value="add">+</option>
    <option value="subtract">-</option>
    <option value="multiply">*</option>
    <option value="divide">/</option>
  </select>

  <button type="submit" name="submit">=</button>
</form>

<?php if(isset($result)): ?>
  <p>Result: <?php echo $result; ?></p>
<?php endif; ?>