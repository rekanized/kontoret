function select3_addcss(){
    styles = `
        select3_selectcontainer {
            display: flex;
            position: relative;
            flex-direction: column;
            color: black;
        }
        select3_selectcontainer input[type="text"] {
            margin: 0px !important;
        }
        select3_searchlist {
            box-shadow: 0px 0px 3px 0px #868686;
            border-radius: 4px;
            background-color: white;
            position: absolute;
            margin-top: 45px;
            z-index: 100;
        }
        select3_searchlist .option-container {
            max-height: 40vh;
            overflow: auto;
            overflow-x: hidden;
        }
        select3_searchlist .option-container > div {
            transition: all 0.2s ease;
            padding: 8px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        select3_searchlist optiontext {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        select3_searchlist > div > div > input[type=checkbox] {
            transform: scale(1.2);
            margin-right: 8px;
        }
        select3_searchlist > div > div:hover {
            background-color: #ababab;
        }
        select3_showbutton {
            transition: transform 0.1s ease;
            text-align: center;
            display: none;
            cursor: pointer;
            right: 0;
            position: absolute;
            user-select: none;
            transform: rotate(-90deg);
            box-shadow: 0px -4px 4px -6px black;
        }
        .select3_open {
            transform: rotate(90deg);
        }
    `;
    let css = document.createElement('style');
    css.innerText = styles;
    document.head.appendChild(css);
}
select3_addcss();

function select3_multiselect(){
    let allSelects = document.querySelectorAll('.select3-multiselect');
    allSelects.forEach(element => {
        // Check so select is not already rendered
        if (element.classList.contains('rendered')){
            return;
        }
        element.classList.add('rendered');

        // Create the container
        let container = document.createElement('select3_selectcontainer');

        // Create the show button
        let showButton = document.createElement('select3_showbutton');
        showButton.innerHTML = '&#10094;';
        showButton.style.display = "block";
        container.appendChild(showButton);
        
        // Insert the current dropdown into the main container that supports the dropdown system
        element.parentElement.insertBefore(container,element);
        container.appendChild(element);

        // Hide the normal dropdown and replace it.
        element.style.display = "none";
        let selector = document.createElement('input');
        let previousSelection = element.querySelector('option[selected="selected"]');
        if (previousSelection){
            selector.value = previousSelection.innerHTML;
        }
        
        let selectName = element.getAttribute('name');
        element.removeAttribute('name');

        selector.setAttribute('type','text');
        selector.setAttribute('readonly','readonly');
        selector.style.cursor = "pointer";
        selector.style.textOverflow = "ellipsis";
        selector.style.width = element.style.width;
        if (element.style.width){
            selector.style.minWidth = "auto";
            selector.style.maxWidth = "auto";
        }
        container.appendChild(selector);

        // Create the search "menu"
        let searchList = document.createElement('select3_searchlist');
        searchList.style.display = "none";
        searchList.style.width = selector.offsetWidth;

        container.appendChild(searchList);

        let searchwildcardBox = document.createElement('div');
        searchwildcardBox.style.display = "flex";
        searchwildcardBox.style.flexDirection = "column";
        searchwildcardBox.style.alignItems = "stretch";
        searchwildcardBox.style.padding = "0px";
        let wildcardSearch = document.createElement('input');
        wildcardSearch.setAttribute('placeholder','Search...');
        searchwildcardBox.appendChild(wildcardSearch);
        wildcardSearch.setAttribute('type','text');
        wildcardSearch.style.display = "flex";
        searchList.appendChild(searchwildcardBox);

        wildcardSearch.addEventListener("keyup",function(){
            let searchText = this.value;
            let optionsToSearch = searchList.querySelectorAll("optiontext");
            optionsToSearch.forEach(option => {
                if (option.innerHTML.toLowerCase().indexOf(searchText.toLowerCase()) !== -1){
                    option.parentNode.style.display = "block";
                }
                else {
                    option.parentNode.style.display = "none";
                }
            });
        });

        let optionContainer = document.createElement('div');
        optionContainer.classList.add('option-container');
        searchList.appendChild(optionContainer);

        // Clone the current options to the new dropdown
        let options = element.querySelectorAll('option');
        options.forEach(option => {
            let newOption = document.createElement('div');
            let checkbox = document.createElement('input');
            checkbox.value = option.value;
            checkbox.setAttribute('name',selectName);
            checkbox.setAttribute('type','checkbox');
            newOption.appendChild(checkbox);
            let optionText = document.createElement('optiontext');
            optionText.appendChild(document.createTextNode(option.text));
            newOption.appendChild(optionText);
            optionContainer.appendChild(newOption);
            checkbox.addEventListener("click",function(){
                this.checked = !this.checked;
            });
            newOption.addEventListener("click",function(){
                let checkboxObject = this.querySelector('input[type="checkbox"]');
                checkboxObject.checked = !checkboxObject.checked;
                allCheckboxes = searchList.querySelectorAll('input[type="checkbox"]');
                let inputText = [];
                allCheckboxes.forEach(checkboxValue => {
                    if (checkboxValue.checked){
                        inputText.push(checkboxValue.parentElement.innerText);
                    }
                });
                selector.value = inputText.join(', ');

                const event = new Event('change');
                element.dispatchEvent(event);
            });
            options.forEach(optionObject => {
                optionObject.remove();
            });
        });

        // viewToggle Button fix for them so the can dynamically change based on how large the select is
        let buttonsFixAmount = (selector.offsetHeight + selector.style.paddingTop);
        showButton.style.width = (buttonsFixAmount)+"px";
        showButton.style.lineHeight = (buttonsFixAmount)+"px";
        selector.style.paddingRight = (buttonsFixAmount)+"px";
        
        if (element.getAttribute('disabled')){
            selector.setAttribute('disabled','true');
            return;
        }

        showButton.addEventListener("click",showSearchlist);
        selector.addEventListener("click",showSearchlist);

        function showSearchlist(){
            showButton.classList.add('select3_open');
            searchList.style.marginTop = selector.offsetHeight;
            searchList.style.width = selector.offsetWidth;
            searchList.style.display = "block";
            showButton.removeEventListener("click",showSearchlist);
            showButton.addEventListener("click",hideSearchlist);
        }
        
        function hideSearchlist(){
            showButton.classList.remove('select3_open');
            searchList.style.display = "none";
            showButton.addEventListener("click",showSearchlist);
        }

    });
}

document.addEventListener("DOMContentLoaded", () => {

    document.addEventListener("click",function(event){
        document.querySelectorAll('select3_searchlist').forEach(function(menu) {
            if (!menu.contains(event.target) && !event.target.matches('select3_showbutton') && !event.target.matches('select3_selectcontainer input')) {
                let closeBtn = menu.closest('select3_selectcontainer').querySelector('select3_showbutton');
                if (closeBtn.classList.contains('select3_open')){
                    closeBtn.click();
                }
            }
        });
    });

    select3_multiselect();
});