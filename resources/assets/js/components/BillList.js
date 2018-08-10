import React, { Component } from 'react';
import BillCard from './BillCard';

class BillList extends Component {
    render() {
        const splitBills = _.chunk(this.props.bills, 2);

        return(
            splitBills.map((row, key) => (
                <div key={key} className="row">
                    {
                        row.map((bill) => (
                            <div key={bill.id} className="col-md-6">
                                <BillCard bill={bill} />
                            </div>
                        ))
                    }
                </div>
            ))
        )
    };
};

export default BillList;