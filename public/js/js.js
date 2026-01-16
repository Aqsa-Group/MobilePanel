document.addEventListener('livewire:load', function () {
    flatpickr("#withdrawal_date", {
        locale: "fa",
        dateFormat: "Y/m/d",
        allowInput: true
    });
});
