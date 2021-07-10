// ================================================================== tabs
let tabs = document.querySelectorAll("._tabs");

for (let index = 0; index < tabs.length; index++) {
	let tab = tabs[index];
	let tabs__captions = tab.querySelectorAll("._tabs__caption");
	let tabs__blocks = tab.querySelectorAll("._tabs__block");

	for (let index = 0; index < tabs__captions.length; index++) {
		let tabs__caption = tabs__captions[index];

		tabs__caption.addEventListener("click", function (e) {
			for (let index = 0; index < tabs__captions.length; index++) {
				let tabs__caption = tabs__captions[index];
				tabs__caption.classList.remove('_active');
				tabs__blocks[index].classList.remove('_active');
			}
                
			tabs__caption.classList.add('_active');
			tabs__blocks[index].classList.add('_active');
			e.preventDefault();
		});
	}
}
