/* ---- Global Requirements ---- */
import React from 'react';
import ReactDOM from 'react-dom';

/* ---- ReactJS Components ---- */
import BillList from './components/BillList';

/* ---- Initialize ReactJS Components ---- */
if ($('#bills-list').length) {
    const bills = $('#bills-list').data('bills');
    const listType = $('#bills-list').data('list-type')
        ? $('#bills-list').data('list-type')
        : null;

    ReactDOM.render(<BillList bills={bills} listType={listType}/>, document.getElementById('bills-list'));
}
