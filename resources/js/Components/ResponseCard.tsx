type ResponseCardProps = {
    planner: string,
}

const ResponseCard = ({ planner }: ResponseCardProps) => {
    return (
        <div
            className="mx-auto max-w-7xl px-6 lg:px-8 bg-zinc-200 rounded mt-8">
            <a href="#">
                <img className="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt=""/>
            </a>
            <div className="p-5">
                <a href="#">
                    <h5 className="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Plano de viagem
                    </h5>
                </a>
                <p className="mb-3 font-normal text-gray-700 dark:text-gray-400">{ planner }</p>
            </div>
        </div>
    );
}

export default ResponseCard;
