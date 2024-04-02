<form>
    <!-- Поля формы с переводами -->
    <div>
        <label for="firstname">@lang('messages.firstname')</label>
        <input type="text" name="firstname" id="firstname" readonly>
    </div>
    <div>
        <label for="lastname">@lang('messages.lastname')</label>
        <input type="text" name="lastname" id="lastname" readonly>
    </div>
    <div>
        <label for="description">@lang('messages.description')</label>
        <textarea name="description" id="description" readonly></textarea>
    </div>

    <!-- Выбор языка -->
    <select name="language" id="language" onchange="changeLanguage(this.value)">
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
        <option value="ru" {{ app()->getLocale() === 'ru' ? 'selected' : '' }}>Русский</option>
        <option value="ru2" {{ app()->getLocale() === 'ru2' ? 'selected' : '' }}>Русский 2</option>
    </select>
</form>

<script>
    function changeLanguage(language) {
    
        fetch(`/get-translations/${language}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('firstname').value = data.firstname;
                document.getElementById('lastname').value = data.lastname;
                document.getElementById('description').innerText = data.description;
            })
            .catch(error => console.error('Error:', error));
    }

    window.onload = function() {
        
        var selectedLanguage = document.getElementById('language').value;
        changeLanguage(selectedLanguage);
        
    };
</script>




