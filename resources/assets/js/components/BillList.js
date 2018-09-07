import React, { Component } from 'react';
import axios from 'axios';
import BillCard from './BillCard';

class BillList extends Component {
    getBillList(bills) {
        if (_.isEmpty(bills)) {
            return <div className={this.props.listType == 'minimalist' ? '' : 'panel panel-default'}>
                <div className={this.props.listType == 'minimalist' ? '' : 'panel-body'}>
                    <p>You&#39;re good! No bills here.</p>
                </div>
            </div>
        }

        return bills.map((row, key) => (
            <div key={key} className={this.props.listType == 'minimalist' ? '' : 'row'}>
                {this.returnBillComponent(row, this.props.listType)}
            </div>
        ));
    };

    returnBillComponent(row, listType = null) {
        return listType && listType == 'minimalist'
            ? row.map((bill) => (
                    <div key={bill.id} className="bill-list-item">
                        <div className={this.getDaysLeft(bill) < 5 ? 'text-danger' : ''}>
                            <div className="checkbox">
                                <label>
                                    <input name={"bill[" + bill.id + "][paid]"} type="checkbox" onClick={this.togglePaid} />
                                    <div className="label-text">
                                        <div className="input">
                                            <div className="check"></div>
                                        </div>
                                        Due in {this.getDaysLeft(bill)} days - {bill.name} - ${bill.amount}
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                ))
            : row.map((bill) => (
                    <div key={bill.id} className="col-md-4">
                        <BillCard bill={bill} />
                    </div>
                ))
    };

    getDaysLeft(bill) {
        var d = new Date();

        return (bill.due_date - d.getDate());
    };

    togglePaid({target}) {
        let ID = $(target).attr('name').replace('bill[', '').replace('][paid]', '');
        let route = `/ajax/bills/${ID}/update`;

        target.parentNode.style.textDecoration = target.checked
            ? "line-through"
            : '';

        axios.post(route, {
            paid: target.checked,
        })
        .then(function (response) {
        })
        .catch(function (error) {
            target.parentNode.style.textDecoration = '';
            $(target).prop('checked', false);
        });
    };

    render() {
        const splitBills = _.chunk(this.props.bills, 3);

        return(
            this.getBillList(splitBills)
        )
    };
};

export default BillList;