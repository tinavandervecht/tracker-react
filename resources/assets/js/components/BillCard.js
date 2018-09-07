import React, { Component } from 'react';

class BillCard extends Component {
    constructor(props) {
        super(props);

        this.state = {
            bill: this.props.bill
        };
    };

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

    togglePaid() {
        let route = `/ajax/bills/${this.state.bill.id}/update`;

        axios.post(route, {
            paid: !this.state.bill.paid,
        })
        .then(function (response) {
            let bill = this.state.bill;
            bill['paid'] = !bill['paid'];
            this.setState({
              bill: bill
            });
        }.bind(this))
        .catch(function (error) {
        });
    }

    render() {
        const deleteRoute = '/bills/' + this.state.bill.id;

        return(
            <div className="panel panel-default">
                <div className="panel-body">
                    <div className="row">
                        <div className="col-xs-1">
                            <div className="h2">
                                <input className="hidden" name={"bill[" + this.props.bill.id + "][paid]"} type="checkbox" defaultChecked={this.props.bill.paid} />

                                <span className={"fa pointer " + (this.state.bill.paid ? 'fa-check text-success' : 'fa-close text-danger')}
                                    onClick={this.togglePaid.bind(this)}
                                >
                                </span>
                            </div>
                        </div>
                        <div className="col-xs-10">
                            <h2>
                                Bill: {this.state.bill.name}
                            </h2>
                            <div className="row">
                                <div className="col-md-6">
                                    <p className="h4">Amount:</p>
                                    <p>${this.state.bill.amount}</p>
                                </div>
                                <div className="col-md-6">
                                    <p className="h4">Day Bill is Due:</p>
                                    <p>{this.getDateWithSuffix(this.state.bill.due_date)}</p>
                                </div>
                            </div>
                            <form method="POST" action={deleteRoute} className="form-inline pull-left m-r-1">
                                <input name="_method" type="hidden" value="DELETE" />
                                <input name="_token" type="hidden" value={window.Laravel.csrfToken} />
                                <button className="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                            <a href={'/bills/' + this.state.bill.id + '/edit'} className="btn btn-default btn-sm pull-left">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        )
    };
};

export default BillCard;