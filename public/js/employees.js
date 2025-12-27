document.addEventListener('DOMContentLoaded', function () {

    const tableRows = document.querySelectorAll('.data-table tbody tr');
    const filterButton = document.querySelector('.filter-button');

    if (filterButton && !document.querySelector('.filter-dropdown')) {
        createFilterDropdown();
    }

    function createFilterDropdown() {

        const filterDropdown = document.createElement('div');
        filterDropdown.className = 'filter-dropdown';

        Object.assign(filterDropdown.style, {
            position: 'absolute',
            top: 'calc(100% + -15px)',
            right: '19px',
            background: 'rgba(40, 40, 40, 0.95)',
            border: '2px solid rgba(5, 193, 247, 0.3)',
            borderRadius: '8px',
            boxShadow: '0 10px 40px rgba(0, 0, 0, 0.3)',
            width: '220px',
            zIndex: '1000',
            display: 'none',
            backdropFilter: 'blur(10px)',
            overflow: 'hidden'
        });

        const filterOptions = [
            { text: '👥 All Employees', value: 'all' },
            { text: '🏋️ Coaches', value: 'coach' },
            { text: '👔 Managers', value: 'manager' },
            { text: '📋 HR Staff', value: 'hr' }
        ];

        const filterList = document.createElement('div');
        filterList.style.cssText = 'padding: 8px 0;';

        filterOptions.forEach((option, index) => {

            const filterItem = document.createElement('button');
            filterItem.type = 'button';
            filterItem.className = 'filter-item';

            Object.assign(filterItem.style, {
                width: '100%',
                textAlign: 'left',
                padding: '10px 16px',
                background: 'transparent',
                border: 'none',
                color: '#A1A09A',
                fontSize: '14px',
                fontWeight: '500',
                cursor: 'pointer',
                transition: 'all 0.3s ease',
                display: 'flex',
                alignItems: 'center',
                gap: '10px'
            });

            filterItem.innerHTML = `${option.text}`;

            filterItem.addEventListener('mouseenter', () => {
                filterItem.style.background = 'rgba(5, 193, 247, 0.1)';
                filterItem.style.color = '#EDEDEC';
            });

            filterItem.addEventListener('mouseleave', () => {
                filterItem.style.background = 'transparent';
                filterItem.style.color = '#A1A09A';
            });

            filterItem.addEventListener('click', () => {
                applyRoleFilter(option.value);
                updateFilterButton(option.text);
                hideFilterDropdown();
            });

            filterList.appendChild(filterItem);

            if (index !== filterOptions.length - 1) {
                const divider = document.createElement('div');
                divider.style.cssText = `
                    height: 1px;
                    background: rgba(5, 193, 247, 0.2);
                    margin: 4px 16px;
                `;
                filterList.appendChild(divider);
            }
        });

        filterDropdown.appendChild(filterList);

        const tableControls = document.querySelector('.table-controls');
        if (tableControls) {
            tableControls.style.position = 'relative';
            tableControls.appendChild(filterDropdown);
        }

        function showFilterDropdown() {
            filterDropdown.style.display = 'block';
            const chevron = filterButton.querySelector('.chevron-icon');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
        }

        function hideFilterDropdown() {
            filterDropdown.style.display = 'none';
            const chevron = filterButton.querySelector('.chevron-icon');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
        }

        filterButton.addEventListener('click', function (e) {
            e.stopPropagation();
            const isVisible = filterDropdown.style.display === 'block';
            isVisible ? hideFilterDropdown() : showFilterDropdown();
        });

        document.addEventListener('click', function (e) {
            if (!filterButton.contains(e.target) && !filterDropdown.contains(e.target)) {
                hideFilterDropdown();
            }
        });

        filterDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        function applyRoleFilter(roleType) {

            tableRows.forEach(row => {
                const roleCell = row.querySelector('.department-badge');
                const roleText = roleCell ? roleCell.textContent.toLowerCase() : '';

                let match = true;

                switch (roleType) {
                    case 'coach':
                        match = roleText.includes('training') || roleText.includes('coach');
                        break;
                    case 'manager':
                        match = roleText.includes('management') || roleText.includes('manager');
                        break;
                    case 'hr':
                        match = roleText.includes('hr');
                        break;
                    case 'all':
                    default:
                        match = true;
                }

                row.dataset.roleMatch = match ? "1" : "0";
                updateRowVisibility(row);
            });

            updateEmployeeCount();
        }

        function updateFilterButton(text) {
            const filterIcon = `
                <svg class="filter-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"/>
                </svg>
            `;
            const chevronIcon = `
                <svg class="chevron-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                </svg>
            `;

            filterButton.innerHTML = `${filterIcon} ${text} ${chevronIcon}`;
        }

        function updateEmployeeCount() {
            const visibleRows = Array.from(tableRows).filter(row =>
                row.style.display !== 'none'
            ).length;

            const summaryElement = document.querySelector('.table-summary p');
            if (summaryElement) {
                summaryElement.textContent = `Showing ${visibleRows} employees`;
            }
        }

        applyRoleFilter('all');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-input');
    const tableRows = document.querySelectorAll('.data-table tbody tr');

    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.trim().toLowerCase();
        const words = searchTerm.split(/\s+/).filter(w => w.length > 0);

        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            let showRow = true;

            words.forEach(word => {
                if (!rowText.includes(word)) {
                    showRow = false;
                }
            });

            row.style.display = (searchTerm === '' || showRow) ? '' : 'none';
        });
    });
});