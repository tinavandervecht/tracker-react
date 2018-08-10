/* ---- Global Requirements ---- */
import React from 'react';
import ReactDOM from 'react-dom';

/* ---- ReactJS Components ---- */
import BillList from './components/BillList';

/* ---- Initialize ReactJS Components ---- */
if ($('#bills-list').length) {
    const bills = $('#bills-list').data('bills');

    ReactDOM.render(<BillList bills={bills}/>, document.getElementById('bills-list'));
}
