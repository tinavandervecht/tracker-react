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
        const deleteRoute = '/bills/' + this.props.bill.id;

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
                    <form method="POST" action={deleteRoute} className="form-inline pull-left">
                        <input name="_method" type="hidden" value="DELETE" />
                        <input name="_token" type="hidden" value={window.Laravel.csrfToken} />
                        <button className="btn btn-danger btn-sm" type="submit">Delete Bill</button>
                    </form>
                    <a href={'/bills/' + this.props.bill.id + '/edit'} className="btn btn-default btn-sm pull-right">Edit Bill</a>
                </div>
            </div>
        )
    };
};

export default BillCard;