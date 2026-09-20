# Week 2 — Screenshots

## Overview

This README documents the screenshots inside the **Week 2 / Screenshots** folder for the **PHP & MySQL Course (CA233)**. Each screenshot captures a specific section of code from `index.php`, isolating one concept at a time for review.

The screenshots are numbered and named to reflect the order the concepts appear in `index.php`: constants, conditional control structures, and loop control structures.

| # | Filename | Section Documented |
|---|---|---|
| 1 | `07-php-constants.png` | The `//Constants` section |
| 2 | `08-php-control-structure.png` | The `//Control Structure` (if / elseif / else) section |
| 3 | `09-php-grade-marking.png` | The `switch` statement grade-marking section |
| 4 | `1.0-php-ternary-operators.png` | The `//Ternary Operators` section |
| 5 | `1.1-php-Loop-Controls.png` | The `//Loop Control Structure` section |

---

## 1. `07-php-constants.png` — PHP Constants

**What this screenshot shows:** the `//Constants` section of `index.php`, where a constant is defined and output.

```php
//Constatnts
define("MY_NAME", "B A T M A N");
echo MY_NAME;
```

**Concepts demonstrated:**

- **Defining a constant:** `define("MY_NAME", "B A T M A N");` creates a constant named `MY_NAME` with the value `"B A T M A N"`, using PHP's built-in `define()` function.
- **No `$` prefix:** Unlike variables, constants are not prefixed with a dollar sign — `MY_NAME`, not `$MY_NAME`.
- **Immutability:** Once defined, a constant's value cannot be changed elsewhere in the script, unlike a regular variable.
- **Naming convention:** The constant name is written in uppercase (`MY_NAME`), following the conventional PHP style for constants.
- **Using a constant:** `echo MY_NAME;` outputs the constant's value directly, referencing it by name with no quotes or `$` sign.

---

## 2. `08-php-control-structure.png` — Conditional Control Structure

**What this screenshot shows:** the `//Control Structure` section of `index.php`, using an `if` / `elseif` / `else` chain to classify an age.

```php
//Control Structure
//If-else-if
$x= 20;
if($x >= 20)
    echo "Adult";
elseif($x >= 10)
    echo "Teenage";
else
    echo "Child";
```

**Concepts demonstrated:**

- **Variable setup:** `$x = 20;` stores the value being tested.
- **`if` statement:** Checks the first condition, `$x >= 20`. Since `$x` is `20`, this condition is true, so `"Adult"` is echoed and the rest of the chain is skipped.
- **`elseif`:** Provides a second condition (`$x >= 10`) that's only checked if the first `if` was false — allowing multiple, mutually exclusive branches.
- **`else`:** The fallback branch, executed only if none of the preceding conditions were true.
- **No braces needed for single statements:** Since each branch is a single `echo` statement, PHP allows the braces (`{}`) to be omitted — the statement immediately after the condition is treated as the branch body.

---

## 3. `09-php-grade-marking.png` — Grade Marking with `switch`

**What this screenshot shows:** the grade-marking section of `index.php`, using a `switch` statement to convert a numeric mark into a letter grade.

```php
//Marks grade using switch
$marks= 100;
switch($marks){
    case($marks >= 90);
        echo "A+";
        break;

    case($marks >= 85);
        echo "A";
        break;

    case($marks >= 80);
        echo "B";
        break;

    case($marks >= 70);
        echo "C";
        break;

    case($marks >= 60);
        echo "D";
        break;

    case($marks >= 50);
        echo "E";
        break;
    default:
        echo "Fail";
        break;
}
```

**Concepts demonstrated:**

- **`switch` statement:** Evaluates `$marks` against a series of `case` labels and executes the matching branch.
- **Boolean expressions as cases:** Instead of matching `$marks` against fixed values, each `case` holds a boolean expression (e.g. `$marks >= 90`). PHP's `switch` performs loose comparison, so this pattern works because `switch(true)`-style logic is being approximated — the first `case` expression that evaluates to `true` (or loosely equals the switch value) is the one executed.
- **`break`:** Ends each case so execution doesn't "fall through" into the next one.
- **`default`:** The fallback branch, executed when no `case` matches — here, outputting `"Fail"`.
- **Result for this example:** Since `$marks` is `100`, the first case (`$marks >= 90`) is true, so `"A+"` is echoed.

---

## 4. `1.0-php-ternary-operators.png` — Ternary Operator

**What this screenshot shows:** the `//Ternary Operators` section of `index.php`, using the `?:` shorthand for a conditional.

```php
//Ternary Operators
$fuel= 0.5;
echo $fuel <= 1 ? "Fill the tank now" : "There's enough fuel in the tank";
```

**Concepts demonstrated:**

- **Ternary syntax:** `condition ? value_if_true : value_if_false` is a compact alternative to a full `if...else` statement.
- **Condition evaluated:** `$fuel <= 1` checks whether `$fuel` (`0.5`) is less than or equal to `1`.
- **Result:** Since `0.5 <= 1` is true, the expression evaluates to `"Fill the tank now"`, which is passed directly to `echo`.
- **Single-line conditionals:** This demonstrates how a two-branch decision can be written and output in one line, rather than spanning multiple `if`/`else` lines.

---

## 5. `1.1-php-Loop-Controls.png` — Loop Control Structures

**What this screenshot shows:** the `//Loop Control Structure` section of `index.php`, demonstrating four different loop types.

```php
//Loop Control Structure

//1. While Loop to print numbers from 1 to 10
$count= 1;
while($count < 10){
    echo $count,"<br>";
    $count++;
}

//2, Do-While Loop to print numbers from 1 to 5
do{
    echo $count,"<br>";
    $count++;
}while($count <=5);

//3. For Loop to print numbers from 1 to 10
for($count= 1; $count<=10; $count++){
    echo $count,"<br>";}

//For Loop to print multiplication table of 6
for($count= 1; $count<=6; ++$count){
    echo "$count times 6 is ", $count*6,"<br>";}

//For Loop to print the square of numbers from 1 to 10
for($count= 1; $count<=10; ++$count){
    echo "The square of $count is ", $count*$count,"<br>";}
```

**Concepts demonstrated:**

- **`while` loop:** Repeats as long as its condition (`$count < 10`) stays true, incrementing `$count` each pass to eventually stop the loop.
- **`do...while` loop:** Runs its body at least once before checking the condition — here it continues counting from wherever `$count` left off, up to `5`.
- **`for` loop:** Combines initialization, condition, and increment into one line (`for($count= 1; $count<=10; $count++)`), used here for a simple count, a multiplication table (`$count * 6`), and a list of squares (`$count * $count`).
- **Reusing `echo` with multiple parameters:** Several lines use `echo $count, "<br>";` or `echo "text ", $value, "<br>";` — passing multiple comma-separated arguments to `echo` in a single call, consistent with the parameters concept introduced in Week 1.
- **Loop variable reuse:** `$count` is reused across the `while`, `do...while`, and first `for` loop, so its value carries over between them — a detail worth noting when reading the output order.

---

## Screenshot Folder Structure

```
Week 2/
└── Screenshots/
    ├── 07-php-constants.png
    ├── 08-php-control-structure.png
    ├── 09-php-grade-marking.png
    ├── 1.0-php-ternary-operators.png
    ├── 1.1-php-Loop-Controls.png
    └── README.md
```

Each image above corresponds to the matching numbered section in this README. The source file they were captured from (`index.php`) lives in the parent `Week 2` folder and is documented separately in that folder's own `README.md`.
