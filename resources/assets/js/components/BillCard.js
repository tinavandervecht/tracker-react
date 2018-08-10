import React, { Component } from 'react';

class BillCard extends Component {
    getDateWithSuffix(i) {
        var j = i % 10,
            k = i % 100;
        if (j == 1 && k != 11) {
            return i + "st";
        }
        if (j == 2 && k != 12) {
            return i + "nd";
        }
        if (j == 3 && k != 13) {
            return i + "rd";
        }
        return i + "th";
    }

    render() {
        return(
            <div className="panel panel-default">
                <div className="panel-heading">
                    <p className='panel-title'>Bill: {this.props.bill.name}</p>
                </div>
                <div className="panel-body">
                    <div className="row">
                        <div className="col-md-6">
                            <p className="h4">Amount:</p>
                            <p>${this.props.bill.amount}</p>
                        </div>
                        <div className="col-md-6">
                            <p className="h4">Day Bill is Due:</p>
                            <p>{this.getDateWithSuffix(this.props.bill.due_date)}</p>
                        </div>
                    </div>
                    <a href="" className="btn btn-danger btn-sm">Delete Bill</a>
                    <a href="" className="btn btn-default btn-sm pull-right">Edit Bill</a>
                </div>
            </div>
        )
    };
};

export default BillCard;