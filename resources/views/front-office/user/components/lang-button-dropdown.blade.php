<div class="relative inline-block text-left">
  <button type="button" class="inline-flex items-center bg-white text-body-dark-12 font-medium py-2 px-4 sm:px-1 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-color ic-page-scroll flex py-2 text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:inline-flex lg:{{ $text_color ?? 'text-primary-color'}} lg:dark:{{ $text_color ?? 'text-primary-color'}} lg:group-hover:{{ $text_color ?? 'text-primary-color'}} lg:group-hover:opacity-70" id="dropdownLanguageButton" aria-expanded="false" aria-haspopup="true">
    {{ session('locale') === 'id' ? 'Indonesia' : 'English' }}
    <i class="lni lni-chevron-down ml-2 text-xl"></i>
  </button>

  <div class="dropdown-menu absolute hidden right-0 w-48 mt-2 bg-primary shadow-lg rounded-lg py-2 ring-1 ring-black ring-opacity-5 focus:outline-none" aria-labelledby="dropdownLanguageButton">
    <a href="{{ route('change-language','id') }}" class="block px-4 sm:px-2 py-6 text-sm text-gray-700 mx-8 sm:mx-3 flex text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:mr-0 lg:inline-flex lg:px-0 text-primary-color dark:text-primary-color lg:group-hover:text-primary-color lg:group-hover:opacity-70">Indonesia</a>
    <a href="{{ route('change-language','en') }}" class="block px-4 sm:px-2 py-6 text-sm text-gray-700 mx-8 sm:mx-3 flex text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:mr-0 lg:inline-flex lg:px-0 text-primary-color dark:text-primary-color lg:group-hover:text-primary-color lg:group-hover:opacity-70">English</a>
  </div>
</div>

<script>
  const dropdownButton = document.getElementById('dropdownLanguageButton');
  const dropdownMenu = dropdownButton.nextElementSibling;

  dropdownButton.addEventListener('click', function () {
    const isExpanded = dropdownButton.getAttribute('aria-expanded') === 'true';
    dropdownButton.setAttribute('aria-expanded', !isExpanded);
    dropdownMenu.classList.toggle('hidden', isExpanded);
  });
</script>
