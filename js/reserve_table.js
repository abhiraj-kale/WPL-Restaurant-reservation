const submit = document.getElementById('submit');
submit.addEventListener('mousedown', function(){
    this.style.backgroundColor = 'yellow'
    this.style.color = 'black';
})
submit.addEventListener('mousedown', function(){
    this.style.backgroundColor = '#fa6400'
    this.style.color = 'white';
})

function validateReservation(){
    const name = document.getElementById('username').value;
    if (name == "") {
        alert("Please enter a valid booking name");
        return false;
    }

    const people = document.getElementById('people').value;
    console.log(people)

    const time = document.getElementById('time').value;
    if (time == "") { 
        alert("Time is not selected");
        return false;
    } else console.log(time)

    const date = document.getElementById('date').value;
    if (date == "") {
        alert("Date is not selected");
        return false;
    } else {
        console.log(date);
    }

    const dine_in_type = document.getElementById('type_dine_in').value;
    console.log(dine_in_type)

    const occasion = document.getElementById('occasion').value;
    console.log(occasion)

    const special_instructions = document.getElementById('special_instructions').value;
    console.log(special_instructions)

    //alert('Your Table has been reserved and confirmation is sent to your mail id')
    return true;
}

