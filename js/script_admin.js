const tabs = document.querySelectorAll('.sidebar a');
const contents = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            contents.forEach(c => c.style.display = 'none');
            document.getElementById(tab.dataset.tab).style.display = 'block';
        });
    });