import React, { Component } from 'react';
import BillCard from './BillCard';

class BillList extends Component {
    getBillList(bills) {
        if (_.isEmpty(bills)) {
            return <p>You&#39;re good! No bills here.</p>;
        }

        return bills.map((row, key) => (
            <div key={key} className="row">
                {this.returnBillComponent(row, this.props.listType)}
            </div>
        ));
    };

    returnBillComponent(row, listType = null) {
        return listType && listType == 'minimalist'
            ? row.map((bill) => (
                    <div key={bill.id} className="bill-list-item">
                        <p className={this.getDaysLeft(bill) < 5 ? 'text-danger' : ''}>
                            Due in {this.getDaysLeft(bill)} days - {bill.name} - ${bill.amount}
                        </p>
                    </div>
                ))
            : row.map((bill) => (
                    <div key={bill.id} className="col-md-6">
                        <BillCard bill={bill} />
                    </div>
                ))
    };

    getDaysLeft(bill) {
        var d = new Date();

        return (bill.due_date - d.getDate());
    };

    render() {
        const splitBills = _.chunk(this.props.bills, 2);

        return(
            this.getBillList(splitBills)
        )
    };
};

export default BillList;