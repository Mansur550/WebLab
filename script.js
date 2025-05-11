const form = document.getElementById('form');
const fname = document.getElementById('f-name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const address= document.getElementById('address');
const zip= document.getElementById('zip');
const city =document.getElementById('city');
const agree = document.getElementById('agree');




form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
   
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
      
     
};

const isValidFullname= fname=> {
    const re = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
    return re.test(fname);
}


const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
const isValidAddress = address => {
    const re = /^[A-Za-z0-9\s,.-]{5,}$/;  // Letters, numbers, spaces, commas, periods, and hyphens
    return re.test(String(address));
}

 const isValidZip = zip => {
    const re = /^\d{4}$/;
    return re.test(String(zip));
 }

const setCheckboxError = (checkbox, message) => {
    const wrapper = document.getElementById('agree-wrapper');
    const errorDisplay = wrapper.querySelector('.error');
    errorDisplay.innerText = message;
    wrapper.classList.add('error');
    wrapper.classList.remove('success');
};

const setCheckboxSuccess = checkbox => {
    const wrapper = document.getElementById('agree-wrapper');
    const errorDisplay = wrapper.querySelector('.error');
    errorDisplay.innerText = '';
    wrapper.classList.add('success');
    wrapper.classList.remove('error');
};




const validateInputs = () => {
    const fnameValue = fname.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const addressValue = address.value.trim();
    const zipValue = zip.value.trim();
    const cityValue = city.value;
    const validAgree = agree.checked;

    
    
    let isFormValid = true;
    


    if(fnameValue === '') {
        setError(alert('Form submitted successfully!'));
        isFormValid = false;
    } else if(!isValidFullname(fnameValue)){
        setError(fname,'Full name must contain at least two words (first and last name)');
        isFormValid = false;

    }else {
        setSuccess(fname);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
        isFormValid = false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        isFormValid = false;
    } else {
        setSuccess(email);
    }
    if (addressValue === '') {
        setError(address, 'Address is required');
        isFormValid = false;
    } else if (!isValidAddress(addressValue) ) {
        setError(address, 'Provide a valid address');
        isFormValid = false;
    } else {
        setSuccess(address);
    }

    
         if (zipValue === '') {
             setError(zip, 'Zip code is required');
             isFormValid = false;
         } else if (!isValidZip(zipValue)) {
             setError(zip, 'Enter a valid 5-digit zip code');
             isFormValid = false;
         } else {
             setSuccess(zip);
        }
    
    



    if(passwordValue === '') {
        setError(password, 'Password is required');
        isFormValid = false;
    } else if (passwordValue.length < 8  ) {
        setError(password, 'Password must be at least 8 character.');
        isFormValid = false;
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
        isFormValid = false;
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
        isFormValid = false;
    } else {
        setSuccess(password2);
    }

    if (cityValue === '') {
        setError(city, 'Please select a city');
        isFormValid = false;
    } else {
        setSuccess(city);
    }


    if (!validAgree) {
        setError(agree, 'You must agree to the terms and conditions');
        isFormValid = false;
    } else {
        setSuccess(agree);
    }

    if (isFormValid) {
        alert('Form submitted successfully!');
        
    }


   


};
