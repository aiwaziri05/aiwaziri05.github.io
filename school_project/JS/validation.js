const validation = new JustValidate("#signup");

validation.addField("#first_name", [
    {
        rule: "required",
        successMessage: "Everything Looks good"
    }
])
.addField("#last_name", [
    {
        rule: "required",
        successMessage: "Everything Looks good"
    }
]) 
.addField("#email", [
    {
        rule: "required"
    },
    {
        rule: "email"
    }
])
.showSuccessLabels(
    { 
        '#email': 'The email looks good!'
})
.addRequiredGroup('#rank', 'Select at lease one option!', {
    successMessage: 'Everything looks good',
})
.addField('#select_rank', [
    {
      rule: 'required',
    },
  ])    