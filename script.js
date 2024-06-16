document.getElementById('mealForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const date = document.getElementById('date').value;
    const meal = document.getElementById('meal').value;
    const review = document.getElementById('review').value;

    if (name && date && meal && review) {
        addMealToTable(name, date, meal, review);
        saveMeal(name, date, meal, review);

        document.getElementById('name').value = '김건우';
        document.getElementById('date').value = '';
        document.getElementById('meal').value = '';
        document.getElementById('review').value = '';
    }
});

document.getElementById('deleteButton').addEventListener('click', function() {
    const password = prompt('비밀번호를 입력하세요:');
    if (password === '0000') {
        localStorage.removeItem('meals');
        clearTable();
    } else {
        alert('비밀번호가 틀렸습니다.');
    }
});

function addMealToTable(name, date, meal, review) {
    const tableBody = document.querySelector('#mealTable tbody');
    const newRow = document.createElement('tr');

    const nameCell = document.createElement('td');
    nameCell.textContent = name;
    newRow.appendChild(nameCell);

    const dateCell = document.createElement('td');
    dateCell.textContent = date;
    newRow.appendChild(dateCell);

    const mealCell = document.createElement('td');
    mealCell.textContent = meal;
    newRow.appendChild(mealCell);

    const reviewCell = document.createElement('td');
    reviewCell.textContent = review;
    newRow.appendChild(reviewCell);

    tableBody.appendChild(newRow);
}

function saveMeal(name, date, meal, review) {
    let meals = JSON.parse(localStorage.getItem('meals')) || [];
    meals.push({ name, date, meal, review });
    localStorage.setItem('meals', JSON.stringify(meals));
}

function loadMeals() {
    let meals = JSON.parse(localStorage.getItem('meals')) || [];
    meals.forEach(meal => addMealToTable(meal.name, meal.date, meal.meal, meal.review));
}

function clearTable() {
    const tableBody = document.querySelector('#mealTable tbody');
    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild);
    }
}

document.addEventListener('DOMContentLoaded', loadMeals);

