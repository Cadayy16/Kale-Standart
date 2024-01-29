(function($) {
    $(document).ready(function() {
const filterButtons = document.querySelectorAll('.filter-button');
		const items = document.querySelectorAll('.clever-fox-sites-items');

		function filterItems(category) {
		  items.forEach(item => {
			if (category === 'all' || item.dataset.category === category) {
			  item.classList.remove('hidden');
			  item.classList.add('visible');
			  item.style.opacity = 1;
			} else {
			  item.classList.remove('visible');
			  item.classList.add('hidden');
			  item.style.opacity = 0;
			}
		  });
		}


		filterButtons.forEach(button => {
		  button.addEventListener('click', event => {
			const category = event.target.dataset.category;
			filterItems(category);
			filterButtons.forEach(button => {
			  button.classList.remove('active');
			});
			event.target.classList.add('active');
		  });
		});
		 });	
}(jQuery));